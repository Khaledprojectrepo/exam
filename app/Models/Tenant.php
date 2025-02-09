<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Stancl\Tenancy\Database\Models\Domain;

class Tenant extends Model implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    protected $fillable = ['id'];

    public function getTenantKeyName(): string
    {
        return 'id';
    }

    public function getTenantKey()
    {
        return $this->getAttribute($this->getTenantKeyName());
    }

    public function getInternal(string $key)
    {
        return $this->getAttribute($key);
    }

    public function putInternal(string $key, $value)
    {
        $this->setAttribute($key, $value);
        $this->save();
    }

    public function setInternal(string $key, $value)
    {
        $this->putInternal($key, $value);
    }

    public function run(callable $callback)
    {
        return $callback();
    }

   
    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }
}
