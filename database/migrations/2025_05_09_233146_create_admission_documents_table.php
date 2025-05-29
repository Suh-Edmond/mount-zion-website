<?php /** @noinspection ALL */

use App\Constant\DocumentCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admission_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admission_id')->constrained();
            $table->enum('category', [DocumentCategory::PASSPORT, DocumentCategory::DEGREE_CERT, DocumentCategory::GCE_CERT, DocumentCategory::HND_CERT, DocumentCategory::ID_CARD]);
            $table->string('slug')->unique();
            $table->string('file_path')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_documents');
    }
};
