<?php

namespace Arrilot\BitrixMigrations\Autocreate\Handlers;

abstract class BaseHandler
{
    /**
     * Array of fields.
     *
     * @var array
     */
    protected $fields;


    public function getIBlockCodeById($IblockId){
        if (!$IblockId) {
            throw new MigrationException('Не задан код инфоблока');
        }

        $filter = [
            'ID'              => $IblockId,
            'CHECK_PERMISSIONS' => 'N',
        ];

        $iblock = (new CIBlock())->GetList([], $filter)->fetch();

        if (!$iblock['ID']) {
            throw new MigrationException("Не удалось найти инфоблок с ID '{$IblockId}'");
        }

        return $iblock['CODE'];
    }
}
