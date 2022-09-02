<?php

namespace Model\Repository;

class ServiceLocator
{
    private IdentityMap $identityMap;

    /**Возвращает хранилище сущностей.
     * Если хранилище сущностей ещё не существует, то порождает его.
     * @return IdentityMap
     */
    public function getIdentityMap(): IdentityMap
    {
        if (is_null($this->identityMap)) {
            $this->identityMap = new IdentityMap();
        }
        return $this->identityMap;
    }
}