<?php
// database/migrations/xxxx_xx_xx_add_soft_deletes_and_approval_fields_to_requisitions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesAndApprovalFieldsToRequisitionsTable extends Migration
{
    public function up()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            // Add nullable foreign keys for approved_by and declined_by
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('declined_by')->nullable()->constrained('users')->nullOnDelete();

            // Add soft delete column
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            // Drop foreign key constraints and columns
            $table->dropForeign(['approved_by']);
            $table->dropColumn('approved_by');

            $table->dropForeign(['declined_by']);
            $table->dropColumn('declined_by');

            // Drop soft delete column
            $table->dropSoftDeletes();
        });
    }
}
