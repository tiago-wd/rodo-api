dcartisan infyom:api_scaffold User --fieldsFile=resources/json_schemas/user_schema.json --factory --seeder --paginate=10 --skip=migration
dcartisan infyom:api_scaffold TransportType --fieldsFile=resources/json_schemas/transport_type_schema.json --factory --seeder --paginate=10 --skip=migration
dcartisan infyom:api_scaffold Transport --fieldsFile=resources/json_schemas/transport_schema.json --factory --seeder --paginate=10 --skip=migration
dcartisan infyom:api_scaffold CargoType --fieldsFile=resources/json_schemas/cargo_type_schema.json --factory --seeder --paginate=10 --skip=migration
dcartisan infyom:api_scaffold Cargo --fieldsFile=resources/json_schemas/cargo_schema.json --factory --seeder --paginate=10 --skip=migration
dcartisan infyom:api_scaffold Bid --fieldsFile=resources/json_schemas/bids_schema.json --factory --seeder --paginate=10 --skip=migration