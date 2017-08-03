<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EQP\Repositories\EquipmentSummaryRepository;
use App\EQP\Validators\EquipmentSummaryValidator;

class EquipmentSummaryController extends ConfigController
{
    protected function getRepository() {
        return new EquipmentSummaryRepository();
    }

    protected function getValidator() {
        return new EquipmentSummaryValidator();
    }

    /**
     *	Overriding base method, not implemented
     */
    public function store(Request $request)
    {
    	return 'Not implemented';
    }

    /**
     *	Overriding base method, not implemented
     */
    public function show($id)
    {
    	return 'Not implemented';
    }

    /**
     *	Overriding base method, not implemented
     */
    public function updated(Request $request, $id)
    {
    	return 'Not implemented';
    }

    /**
     *	Overriding base method, not implemented
     */
    public function destroy($id)
    {
    	return 'Not implemented';
    }
}
