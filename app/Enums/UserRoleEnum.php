<?php

namespace App;

enum UserRoleEnum: string
{
    case COORDINATOR = 'coordinator';
    case SECRETARY = 'secretary';
    case PRIEST = 'priest';
    case PASCOM = 'pascom';
    case ADMIN = 'admin';

    public function getLabel(): string
    {
        return match ($this) {
            self::COORDINATOR => 'Coordenador/membro de pastoral',
            self::SECRETARY => 'Secretário(a)',
            self::PRIEST => 'Pároco/vigário',
            self::PASCOM => 'Pasconeiro(a)',
            self::ADMIN => 'Administrador',
        };
    }
}
