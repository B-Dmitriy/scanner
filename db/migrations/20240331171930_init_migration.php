<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Util\Expression;

final class InitMigration extends AbstractMigration
{
    public function up(): void
    {
        // Создание таблицы страны
        $exists = $this->hasTable('countries');
        if (!$exists) {
            $table = $this->table('countries');
            $table
                ->addColumn('name', 'string', ['limit' => 128])
                ->create();

            $table
            ->changeColumn('id', 'biginteger', ['identity' => true])
            ->save();
        }

        // Создание таблицы артистов
        $exists = $this->hasTable('artists');
        if (!$exists) {
            $table = $this->table('artists');
            $table
                ->addColumn('name', 'string', ['limit' => 128])
                ->addColumn('country_id', 'biginteger', ['null' => true])
                // 'delete' => 'SET_NULL' - без этого, нельзя будет удалить страну, использующуюся в артисте
                ->addForeignKey('country_id', 'countries', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
                ->create();

            $table
                ->changeColumn('id', 'biginteger', ['identity' => true])
                ->save();
        }

        // Создание таблицы жанров
        $exists = $this->hasTable('genres');
        if (!$exists) {
            $table = $this->table('genres');
            $table
                ->addColumn('name', 'string', ['limit' => 128])
                ->create();
            
            $table
                ->changeColumn('id', 'biginteger', ['identity' => true])
                ->save();
        }

        // Создание таблицы виниловых записей
        // MYSQL
        // -----------------------------------------------
        // CREATE TABLE IF NOT EXIST records (
        //  id INTEGER NOT NULL AUTO_INCREMENT,
        //  name VARCHAR(512) NOT NULL UNIQUE,
        //  released INTEGER NOT NULL CHECK (released > 0 AND released < 9999),
        //  description VARCHAR(2048),
        //  style VARCHAR(128),
        //  price NUMERIC(9,2),
        //  amount INTEGER NOT NULL,
        //  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        //  updated_at TIMESTAMP,
        //  artist_id INTEGER,
        //  genre_id INTEGER,
        //  CONSTRAINT records_pk_constraint PRIMARY KEY (id),
        //  INDEX artists_ind (artist_id), FOREIGN KEY (artist_id) REFERENCES artists(id),
        //  INDEX genres_ind (genre_id), FOREIGN KEY (genre_id) REFERENCES genres(id)
        // );
 
        $exists = $this->hasTable('records');
        if (!$exists) {
            $table = $this->table('records');
            $table->addColumn('name', 'string', ['limit' => 512, 'null' => false])
                ->addIndex('name', ['unique' => true])
                ->addColumn('released', 'integer', ['null' => false])
                ->addColumn('description', 'string', ['limit' => 2048])
                ->addColumn('style', 'string', ['limit' => 128])
                ->addColumn('price', 'decimal', ['null' => false, 'precision' => 9, 'scale' => 2])
                ->addColumn('amount', 'integer', ['null' => false])
                ->addColumn('artist_id', 'biginteger', ['null' => true])
                ->addForeignKey('artist_id', 'artists', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
                ->addColumn('genre_id', 'biginteger', ['null' => true])
                ->addForeignKey('genre_id', 'genres', 'id', ['delete' => 'SET_NULL', 'update' => 'NO_ACTION'])
                ->addTimestamps('created_at', 'updated_at')
                ->create();
            
            $table
                ->changeColumn('id', 'biginteger', ['identity' => true])
                ->save();

            $this->execute("ALTER TABLE records ADD CHECK (released > 0 AND released < 9999)");
            $this->execute("ALTER TABLE records ADD CHECK (amount >= 0)");
        }
        
    }

    public function down(): void
    {

        // Удаление таблицы виниловых записей
        $exists = $this->hasTable('records');
        if($exists) {
            $this->table('records')->drop()->save();
        }

        // Удаление таблицы артистов
        $exists = $this->hasTable('artists');
        if($exists) {
            $this->table('artists')->drop()->save();
        }

        // Удаление таблицы страны
        $exists = $this->hasTable('countries');
        if($exists) {
            $this->table('countries')->drop()->save();
        }

        // Удаление таблицы жанров
        $exists = $this->hasTable('genres');
        if($exists) {
            $this->table('genres')->drop()->save();
        }
    }
}