<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddImagesInRecords extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('records');
        $table->addColumn('image', 'string', ['limit' => 512])
              ->update();
    }

    public function down(): void
    {
        $table = $this->table('records');
        $table->removeColumn('image')
              ->save();
    }
}
