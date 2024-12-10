<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Employee;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class EmployeeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Employee(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('sex');
            $grid->column('age');
            $grid->column('phonenum');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Employee(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('sex');
            $show->field('age');
            $show->field('phonenum');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Employee(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('sex');
            $form->text('age');
            $form->text('phonenum');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
