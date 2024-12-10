<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\PersonnelAssigner;
use App\Admin\Repositories\PublishList;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models\Employee;

class PublishListController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new PublishList(), function (Grid $grid) {
            $grid->column('id', 'ID')->sortable();
            $grid->column('uid','邀请人id');
            $grid->column('location', '位置');
            $grid->column('name', '姓名');
            $grid->column('room_type', '房型');
            $grid->column('budget', '预算');
            $grid->column('contact', '联系方式');
            $grid->column('contact_detail', '联系地址');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->column('status','分配状态')->using([0 => '未分派', 1 => '已分派',2=>'已成交',3=>'已结案',4=>'无效客户'])->label([
                1 => 'warning',
                2 => 'danger',
                3 => 'success',
                4 => 'danger',
            ]);
              $grid->actions(function (Grid\Displayers\Actions $actions) {
                // 获取当前行的status字段值
                $status = $actions->row->status;

                // 判断status为0时显示自定义按钮
                if ($status == 0) {
                    $actions->append(new PersonnelAssigner('<i class="feather icon-feather"></i> 分派人员'));
                }
            });


            $grid->fixColumns(2);


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

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
