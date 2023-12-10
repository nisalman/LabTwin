<?php

namespace App\Http\Controllers\Admin\Operations;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Route;

trait BrowserPrintOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupBrowserPrintRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/browser-print', [
            'as'        => $routeName.'.browserPrint',
            'uses'      => $controller.'@browserPrint',
            'operation' => 'browserPrint',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupBrowserPrintDefaults()
    {
        CRUD::allowAccess('browserPrint');

        CRUD::operation('browserPrint', function () {
            CRUD::loadDefaultOperationSettingsFromConfig();
        });

        CRUD::operation('list', function () {
            // CRUD::addButton('top', 'browser_print', 'view', 'crud::buttons.browser_print');
            // CRUD::addButton('line', 'browser_print', 'view', 'crud::buttons.browser_print');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function browserPrint()
    {
        CRUD::hasAccessOrFail('browserPrint');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = CRUD::getTitle() ?? 'Browser Print '.$this->crud->entity_name;

        // load the view
        return view('crud::operations.browser_print', $this->data);
    }
}