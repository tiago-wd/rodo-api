<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cargo;
use App\Models\CargoType;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Cargo::class, function (Faker $faker) {

    $geolocalion = [
        '0101000020E61000004F5DF92CCF8548C045813E91274D36C0',
        '0101000020E6100000F163CC5D4B8848C000FF942A514E36C0',
        '0101000020E6100000F5A276BF0A8E48C07F2E1A321E5136C0',
        '0101000020E6100000D09CF529C78448C0E355D636C54B36C0',
        '0101000020E61000005891D101498648C03C873254C54C36C0',
        '0101000020E61000002EC901BB9A8848C0CD069964E45436C0',
        '0101000020E6100000B2F2CB608C8848C038A3E6ABE44B36C0',
        '0101000020E6100000F54C2F31968748C04E603AADDB5836C0',
        '0101000020E6100000E564E256418648C03DB5FAEAAA5C36C0',
        '0101000020E61000002810768A558D48C06FD74B53045436C0',
        '0101000020E6100000F4DDAD2CD18948C05726FC523F5336C0',
        '0101000020E6100000C2887D02289048C07120240B985036C0',
        '0101000020E6100000008C67D0D08548C0B98C9B1A685636C0',
        '0101000020E6100000C520B072688D48C02FDD2406815D36C0',
        '0101000020E6100000F9653046248848C02ACAA5F10B4B36C0',
        '0101000020E61000005891D101498248C067B5C01E135536C0',
        '0101000020E61000002CD670917B8848C0EF3CF19C2D6436C0',
        '0101000020E61000000953944BE38B48C07024D060535736C0',
        '0101000020E6100000EEEBC039238848C0A46E675F795436C0',
        '0101000020E6100000EEB089CC5C8A48C080812040864636C0',
        '0101000020E61000008ECEF9298E8948C024B55032394D36C0',
        '0101000020E6100000D829560DC28648C0501C40BFEF5736C0',
        '0101000020E6100000C493DDCCE88748C0A148F7730A5636C0',
        '0101000020E61000004B395FECBD8648C094DDCCE8475336C0',
        '0101000020E6100000965E9B8D958C48C09241EE224C5D36C0',
        '0101000020E61000000072C284D18848C0F01472A59E4D36C0',
        '0101000020E61000000EDDEC0F948D48C0E08618AF794D36C0',
        '0101000020E61000002EFEB627488648C0FCA9F1D24D5A36C0',
        '0101000020E610000005DEC9A7C78A48C0D940BAD8B44E36C0',
        '0101000020E6100000AE4676A5658448C06519E258175B36C0',
        '0101000020E6100000CDEA1D6E878848C019ABCDFFAB5236C0',
        '0101000020E61000005517F032C38A48C05AD76839D04F36C0',
        '0101000020E6100000CEE0EF17B38348C0E31C75745C5536C0',
        '0101000020E6100000AD16D863228948C059349D9D0C5636C0',
        '0101000020E6100000C6DB4AAFCD8048C0705B5B785E4E36C0',
        '0101000020E61000002AFD84B35B8D48C037E2C96E665C36C0',
        '0101000020E610000001A777F17E8A48C09AB4A9BA474636C0',
        '0101000020E6100000EE073C30808448C01D3A3DEFC65E36C0',
        '0101000020E61000005F7EA7C98C8948C03694DA8B686336C0',
        '0101000020E61000003AE8120EBD8948C0C9E369F9814B36C0',
        '0101000020E6100000AD8A7093518348C0027FF8F9EF5136C0',
        '0101000020E6100000871A8524B38848C0672618CE355436C0',
        '0101000020E61000003D9E961FB88E48C07ADFF8DA335736C0',
        '0101000020E6100000C58EC6A17E8948C033DE567A6D4A36C0',
        '0101000020E6100000BEDD921CB08D48C0EED0B018755D36C0',
        '0101000020E6100000EB538EC9E28C48C0DA3A38D89B5C36C0',
        '0101000020E6100000C6F99B50888C48C076340EF5BB4C36C0',
        '0101000020E610000099B85510039148C01C2444F9825236C0',
        '0101000020E6100000E19BA6CF0E8C48C0A0FCDD3B6A5036C0',
        '0101000020E61000005E4BC8073D8148C03E3DB665C04D36C0',
        '0101000020E610000048A5D8D1388448C0EB3BBF28414F36C0',
        '0101000020E61000009C4D4700378D48C0C5538F34B85936C0',
        '0101000020E6100000ADFC3218238648C00EDC813AE54D36C0',
        '0101000020E610000063601DC70F8948C00AD9791B9B5536C0',
        '0101000020E610000081D1E5CDE18C48C03B8F8AFF3B5A36C0',
        '0101000020E61000006BBB09BE698848C0A96917D34C4F36C0',
        '0101000020E6100000E753C72AA58948C00EBDC5C37B5236C0',
        '0101000020E610000007D0EFFB378148C016DBA4A2B14E36C0',
        '0101000020E610000059130B7C458748C07E3672DD944E36C0',
        '0101000020E6100000BD0166BE838F48C0EB724A404C4E36C0',
        '0101000020E6100000183F8D7BF38948C0CF9F36AAD34D36C0',
        '0101000020E61000006F10AD156D8648C04D66BCADF45236C0',
        '0101000020E61000005D4E0988498448C0FB22A12DE74A36C0',
        '0101000020E610000001A60C1CD08448C076AA7CCF484C36C0',
        '0101000020E6100000191D90847D8948C03E22A644126536C0',
        '0101000020E6100000AED9CA4BFE8148C00262122EE45136C0',
        '0101000020E6100000F433F5BA458C48C0069CA564395536C0',
        '0101000020E6100000280B5F5FEB8A48C020F0C000C25B36C0',
        '0101000020E6100000F10F5B7A348948C00C957F2DAF6436C0',
        '0101000020E610000071581AF8518B48C09161156F645636C0',
        '0101000020E6100000336DFFCA4A7F48C0A1A014ADDC4F36C0',
        '0101000020E6100000632B685A628748C03F8EE6C8CA4736C0',
        '0101000020E610000046990D32C98C48C052D4997B485836C0',
        '0101000020E6100000F8DEDFA0BD8448C00FB743C3625836C0',
        '0101000020E6100000452E3883BF8948C05AD93EE42D4F36C0',
        '0101000020E6100000E620E868558148C0DB17D00B774E36C0',
        '0101000020E6100000AA9CF6949C8B48C0EC8A19E1ED5936C0',
        '0101000020E61000005F9A22C0E98B48C0672C9ACE4E4E36C0',
        '0101000020E610000055DAE21A9F7D48C0BA8784EFFD5136C0',
        '0101000020E61000004A9869FB578C48C0E0DBF4673F5636C0',
        '0101000020E6100000732EC555658348C09ACE4E06475536C0',
        '0101000020E610000030BABC395C8748C0069CA564394D36C0',
        '0101000020E61000001E51A1BAB98648C0834F73F2225336C0',
        '0101000020E6100000ECA2E8818F8D48C084A0A3552D5D36C0',
        '0101000020E61000005F24B4E55C8248C0A26131EA5A4F36C0',
        '0101000020E6100000CE6DC2BD328748C020B58993FB5136C0',
        '0101000020E6100000159161156F7A48C0E8A221E3515636C0',
        '0101000020E6100000D68F4DF2238E48C031B1F9B8365436C0',
        '0101000020E6100000535DC0CB0C8348C04C8E3BA5835536C0',
        '0101000020E61000002FA2ED98BA8748C05BEECC04C35136C0',
        '0101000020E6100000A818E76F428D48C05E4D9EB29A5636C0',
        '0101000020E6100000041C42959A8148C0B5FB5580EF4E36C0',
        '0101000020E6100000DAAED007CB8C48C0D1CFD4EB165D36C0',
        '0101000020E6100000BC07E8BE9C8548C0FDBCA948855936C0',
        '0101000020E61000003659A31EA28B48C034812216315436C0',
        '0101000020E610000034B91803EB8C48C02E71E481C84A36C0',
        '0101000020E61000005036E50AEF8A48C08E041A6CEA5036C0',
        '0101000020E6100000B939950C008B48C0026729594E5636C0',
        '0101000020E6100000D6011077F58448C0DB6FED44495836C0',
        '0101000020E6100000147651F4C08F48C05A457F68E65136C0'
    ];

    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(),
        'weight' => $faker->numberBetween(100,1000),
        'price' => $faker->numberBetween(1000,10000),
        'from_where' => $geolocalion[array_rand($geolocalion)],
        'to_where' => $geolocalion[array_rand($geolocalion)],
        'cargo_type_id' => CargoType::all()->random(),
        'user_id' => User::all()->random(),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
