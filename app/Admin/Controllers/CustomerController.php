<?php

namespace App\Admin\Controllers;

use App\Models\Customer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CustomerController extends AdminController
{
    protected $title = 'Customers';

    public function grid()
    {
        $grid = new Grid(new Customer());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('gender', __('Gender'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));
        $grid->column('phone_number', __('Phone'));
        $grid->column('note', __('Note'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Customer::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('gender', __('Gender'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('phone_number', __('Phone'));
        $show->field('note', __('Note'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Customer());

        $form->text('name', __('Name'));
        $form->select('gender', __('Gender'))->options([0 => 'Male', 1 => 'Female']);
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->mobile('phone_number', __('Phone'));
        $form->textarea('note', __('Note'));

        return $form;
    }
}
