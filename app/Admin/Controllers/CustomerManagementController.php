<?php

namespace App\Admin\Controllers;

use App\Models\PublishList;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CustomerManagementController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PublishList(), function (Grid $grid) {
            $grid->model()->where('status','>','1');
            $grid->column('id')->sortable();
            $grid->column('location');
            $grid->column('name');
            $grid->column('sex');
            $grid->column('age');
            $grid->column('room_type');
            $grid->column('budget');
            $grid->column('contact');
            $grid->column('Handler');
            $grid->column('status')->using([0 => '未分派', 1 => '已分派',2=>'已成交',3=>'已结案',4=>'无效客户'])->label([
                1 => 'warning',
                2 => 'danger',
                3 => 'success',
                4 => 'danger',
            ]);


            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('status')->select([
                    0 => '未分派',
                    1 => '已分派',
                    2 => '已成交',
                    3 => '已结案',
                    4 => '无效客户'
                ]);

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
        return Show::make($id, new PublishList(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('location');
            $show->field('location_detail');
            $show->field('name');
            $show->field('sex');
            $show->field('age');
            $show->field('room_type');
            $show->field('budget');
            $show->field('contact');
            $show->field('contact_detail');
            $show->field('note');
            $show->field('Handler');
            $show->field('status');
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
        return Form::make(new PublishList(), function (Form $form) {
            $form->display('id');
            $form->text('uid');
            $form->text('location');
            $form->text('location_detail');
            $form->text('name');
            $form->text('sex');
            $form->text('age');
            $form->text('room_type');
            $form->text('budget');
            $form->text('contact');
            $form->text('contact_detail');
            $form->text('note');
            $form->text('Handler');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
