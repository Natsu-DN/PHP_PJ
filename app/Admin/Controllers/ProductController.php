<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    protected $title = 'Products';

    public function grid()
    {
        $grid = new Grid(new Product());

        // Cấu hình các cột trong Grid
        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('id_type', __('ID Type'));
        $grid->column('description', __('Description'));
        $grid->column('unit_price', __('Unit Price'));
        $grid->column('promotion_price', __('Promotion Price'));
        $grid->column('image', __('Image'));
        $grid->column('unit', __('Unit'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('new', __('New'));

        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('id_type', __('ID Type'));
        $show->field('description', __('Description'));
        $show->field('unit_price', __('Unit Price'));
        $show->field('promotion_price', __('Promotion Price'));
        $show->field('image', __('Image'));
        $show->field('unit', __('Unit'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('new', __('New'));

        return $show;
    }

    protected function form()
    {
        $form = new Form(new Product());

        $form->text('name', __('Tên'));
        $form->number('id_type', __('Loại'));
        $form->textarea('description', __('Mô Tả'));
        $form->decimal('unit_price', __('Unit Price'));
        $form->decimal('promotion_price', __('Promotion Price'));
        $form->image('image', __('Hình Ảnh'));
        $form->text('unit', __('Đợn vị'));
        $form->text('new', __('New'));

        return $form;
    }
}
