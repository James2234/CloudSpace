<?php

namespace App\Admin\Forms;


use App\Models\Employee;
use App\Models\PublishList;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Contracts\LazyRenderable;

class PersonnelAssignerForm extends Form implements LazyRenderable
{
    use LazyWidget;
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        $user_id = $this->payload['id'] ?? null;

        // return $this->response()->error('Your error message.');
        if(!$input['Hanlder']){
            return $this->response()->error('请选择分派人员!');
        }else{
            $handler = Employee::where('id',$input['Hanlder'])->value('name');
            PublishList::where('id',$user_id)->update(['Handler'=>$handler,'status'=>1]);
        }

        return $this
				->response()
				->success('分派成功!')
				->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
//        $this->select(Employee::all()->pluck('name','id'));
        $this->select('Hanlder','分派人员')->options(Employee::all()->pluck('name','id'));
    }


    /**
     * The data of the form.
     *
     * @return array
     */
//    public function default()
//    {
//        return [
//            'name'  => 'John Doe',
//        ];
//    }
}
