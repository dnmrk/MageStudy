<?php
namespace Dean\BrandExample\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\SchemaPatchInterface;

class EnforceBrandCasing implements SchemaPatchInterface
{    
    public static function getDependencies()
    {
        return [];
    }

    public function getAliases() 
    {
        return [];
    }
    
    public function apply()
    {
       
    }
}
