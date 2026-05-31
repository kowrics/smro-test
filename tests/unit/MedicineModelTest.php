<?php

namespace App\Tests;

use App\Models\MedicineModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class MedicineModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $migrate     = true;
    protected $migrateOnce = false;
    protected $refresh     = true;
    protected $namespace   = 'App';

    public function testMedicineCanBeCreated()
    {
        $model = new MedicineModel();
        $data  = [
            'name'  => 'Test Medicine',
            'unit'  => 'tablet',
            'stock' => 100,
        ];
        $id = $model->insert($data);
        $this->assertIsInt($id);
        $this->assertGreaterThan(0, $id);
    }

    public function testMedicineCanBeFound()
    {
        $model = new MedicineModel();
        $model->insert(['name' => 'Find Me', 'unit' => 'capsule', 'stock' => 50]);
        $result = $model->where('name', 'Find Me')->first();
        $this->assertNotNull($result);
        $this->assertEquals('Find Me', $result['name']);
    }

    public function testMedicineStockIsInteger()
    {
        $model = new MedicineModel();
        $model->insert(['name' => 'Stock Test', 'unit' => 'tablet', 'stock' => 200]);
        $result = $model->where('name', 'Stock Test')->first();
        $this->assertIsNumeric($result['stock']);
    }

    public function testMedicineCanBeUpdated()
    {
        $model = new MedicineModel();
        $id    = $model->insert(['name' => 'Old Name', 'unit' => 'tablet', 'stock' => 10]);
        $model->update($id, ['name' => 'New Name']);
        $result = $model->find($id);
        $this->assertEquals('New Name', $result['name']);
    }

    public function testMedicineCanBeDeleted()
    {
        $model = new MedicineModel();
        $id    = $model->insert(['name' => 'Delete Me', 'unit' => 'tablet', 'stock' => 5]);
        $model->delete($id);
        $result = $model->find($id);
        $this->assertNull($result);
    }
}