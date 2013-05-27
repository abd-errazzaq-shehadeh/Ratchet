<?php

App::uses('PushableBehavior', 'Ratchet.Model/Behavior');

class PushableBehaviorTestCapsule extends PushableBehavior {
    public function afterSavePrepareEventNameTest($eventName, $id, $data) {
        return parent::afterSavePrepareEventName($eventName, $id, $data);
    }
}

class PushableBehaviorTest extends CakeTestCase {
    
    public function setUp() {
        parent::setUp();
        
        $this->PushableBehaviorTestCapsule = new PushableBehaviorTestCapsule();
    }
    
    public function tearDown() {
        parent::tearDown();
        
        unset($this->PushableBehaviorTestCapsule);
    }
    
    public function testAfterSavePrepareEventNameId() {
        $result = $this->PushableBehaviorTestCapsule->afterSavePrepareEventNameTest('Ratchet.Model.test.{id}', 1, array());
        $this->assertEqual($result, 'Ratchet.Model.test.1');
    }
    
    public function testAfterSavePrepareEventNameData() {
        $result = $this->PushableBehaviorTestCapsule->afterSavePrepareEventNameTest('Ratchet.Model.test.{uuid}', 1, array(
            'uuid' => 'kads-asdef-awsefg-234213',
        ));
        $this->assertEqual($result, 'Ratchet.Model.test.kads-asdef-awsefg-234213');
    }
    
}