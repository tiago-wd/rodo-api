# ./vendor/bin/phpunit --filter it_can_create_set_variance ./tests/Api/ApiKey/AdvancedVarianceApiTest.php

echo "Testing Apis"
./vendor/bin/phpunit ./tests/Apis/BidApiTest.php
./vendor/bin/phpunit ./tests/Apis/CargoApiTest.php
./vendor/bin/phpunit ./tests/Apis/CargoTypeApiTest.php
./vendor/bin/phpunit ./tests/Apis/TransportApiTest.php
./vendor/bin/phpunit ./tests/Apis/TransportTypeApiTest.php
./vendor/bin/phpunit ./tests/Apis/UserApiTest.php

echo "Testing Repositories"
./vendor/bin/phpunit  ./tests/Repositories/BidRepositoryTest.php
./vendor/bin/phpunit ./tests/Repositories/CargoRepositoryTest.php
./vendor/bin/phpunit ./tests/Repositories/CargoTypeRepositoryTest.php
./vendor/bin/phpunit ./tests/Repositories/TransportRepositoryTest.php
./vendor/bin/phpunit ./tests/Repositories/TransportTypeRepositoryTest.php
./vendor/bin/phpunit ./tests/Repositories/UserRepositoryTest.php