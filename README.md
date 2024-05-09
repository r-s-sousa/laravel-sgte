[![Laravel](https://github.com/r-s-sousa/laravel-sgte/actions/workflows/laravel.yml/badge.svg?branch=main)](https://github.com/r-s-sousa/laravel-sgte/actions/workflows/laravel.yml)

# Funcionalidades necessárias

Essas são as funcionalidades que estão sendo utilizadas atualmente no sistema SGTE Manager

- ✅ auth 

- patente == position
    - ✅ routes resource
    - ✅ model [shortName, name, priority]
    - ✅ migration
    - controller
    - view

- seção == section
    - ✅ routes resource
    - ✅ model [shortName, name]
    - ✅ migration
    - controller
    - view

- militares == military
    - ✅ routes resource
    - ✅ model [
        position_id
        war_number
        war_name
        name
        section_id
        mother_name
        father_name
        military_identity
        function
        phone_number
        manager_number
        email
        start_date
        cpf
        birth_date
        marital_status
        blood_type
        consumes_alcohol
        smokes_cigarette
        religion
        driver_license_type
        behavior
    ]
    - ✅ migration
    - controller
    - view

- situation == situation
    - ✅ routes resource
    - ✅ model [military_id, start_date, days, end_date, description]
    - ✅ migration
    - controller
    - view

- fatd == transgression
    - ✅ routes resource
    - ✅ model [actuator_id, acted_id, description, date, punishiment_description, punishment_type, days]
    - ✅ migration
    - controller
    - view

- caveirinha == comment
    - ✅ routes resource
    - ✅ model [actuator_identifier, acted_id, date, description, type, count_punishments, count_comments]
    - migration
    - controller
    - view

- declarações == declaration
    - ✅ routes specific
    - model [dont need]
    - controller
    - view

- taf simulator
    - ✅ routes specific
    - model [dont need]
    - seed default values
    - controller
    - view

- geração de nada deve por data de praça / militar
    - ✅ routes specific
    - model [dont need]
    - controller
    - view

- geração de crachás pelo relatório de designação
    - ✅ routes specific
    - model [dont need]
    - controller
    - view

## Ajustes nas funcionalidades
- ordenação na tela de militares deve ser pela graduação depois número
- no caveirinha precisa adicionar dinâmicamente o tipo de observação:
	- neutro
	- dispensa médica
	- dispensa do expediente
