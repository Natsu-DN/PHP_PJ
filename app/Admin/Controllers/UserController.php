<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    protected $title = 'products';

    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('id_type', __('Type'));
        $grid->column('description', __('Description'));
        $grid->column('unit_price', __('Unit Price'));
        $grid->column('promotion_price', __('Promotion Price'));
        $grid->column('image', __('Image'));
        $grid->column('unit', __('Unit'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('id_type', __('Type'));
        $show->field('description', __('Description'));
        $show->field('unit_price', __('Unit Price'));
        $show->field('promotion_price', __('Promotion Price'));
        $show->field('image', __('Image'));
        $show->field('unit', __('Unit'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->text('id_type', __('Type'));
        $form->textarea('description', __('Description'));
        $form->number('unit_price', __('Unit Price'));
        $form->number('promotion_price', __('Promotion Price'));
        $form->text('image', __('Image'));
        $form->text('unit', __('Unit'));

        return $form;
    }
}
