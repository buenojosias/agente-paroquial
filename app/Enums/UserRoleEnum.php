<?php

namespace App;

enum UserRoleEnum: string
{
    case MEMBER = 'member';
    case SECRETARY = 'secretary';
    case PRIEST = 'priest';
    case PASCOM = 'pascom';
    case ADMIN = 'admin';

    public function getLabel(): string
    {
        return match ($this) {
            self::MEMBER => 'Membro/coordenador(a) de grupo',
            self::SECRETARY => 'Secretário(a)',
            self::PRIEST => 'Pároco/vigário',
            self::PASCOM => 'Pasconeiro(a)',
            self::ADMIN => 'Administrador',
        };
    }
}
