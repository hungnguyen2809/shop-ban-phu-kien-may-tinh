<?php

use Illuminate\Support\Facades\Route;

//User-Login
Route::get('/login', [App\Http\Controllers\UserController::class, 'loginUser'])->name('loginUser');
Route::post('/submit-login', [App\Http\Controllers\UserController::class, 'submitLoginUser'])->name('submitLoginUser');

//User-Register
Route::get('/register', [App\Http\Controllers\UserController::class, 'registerUser'])->name('registerUser');
Route::post('/submit-register', [App\Http\Controllers\UserController::class, 'submitRegisterUser'])->name('submitRegisterUser');

//User-Logout
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logoutUser'])->name('logoutUser');

//Admin
Route::middleware("adminLogin")->group(function(){
    //Admin-Dashboard
    Route::get('/dashboard', [App\Http\Controllers\AdminContoller::class, 'index'])->name('quanTri');

    //Admin-User
    Route::get('/dashboard/users', [App\Http\Controllers\AdminContoller::class, 'showUsers'])->name('showUsers');
    Route::get('/dashboard/add-user', [App\Http\Controllers\AdminContoller::class, 'addUser'])->name('addUser');
    Route::post('/dashboard/save-add-user', [App\Http\Controllers\AdminContoller::class, 'saveAddUser'])->name('saveAddUser');
    Route::get('/dashboard/edit-user/{id}', [App\Http\Controllers\AdminContoller::class, 'editUser'])->name('editUser');
    Route::post('/dashboard/save-edit-user/{id}', [App\Http\Controllers\AdminContoller::class, 'saveEditUser'])->name('saveEditUser');
    Route::get('/dashboard/delete-user/{id}', [App\Http\Controllers\AdminContoller::class, 'deleteUser'])->name('deleteUser');

    //Admin-Product
    Route::get('/dashboard/products', [App\Http\Controllers\ADProductController::class, 'index'])->name('showProducts');
    Route::get('/dashboard/add-product', [App\Http\Controllers\ADProductController::class, 'addProduct'])->name('addProduct');
    Route::post('/dashboard/save-add-product', [App\Http\Controllers\ADProductController::class, 'saveAddProduct'])->name('saveAddProduct');
    Route::get('/dashboard/edit-product/{id}', [App\Http\Controllers\ADProductController::class, 'editProduct'])->name('editProduct');
    Route::post('/dashboard/save-edit-product/{id}', [App\Http\Controllers\ADProductController::class, 'saveEditProduct'])->name('saveEditProduct');
    Route::get('/dashboard/delete-product/{id}', [App\Http\Controllers\ADProductController::class, 'deleteProduct'])->name('deleteProduct');

    //Admin-Category
    Route::get('/dashboard/categorys', [App\Http\Controllers\ADCategoryController::class, 'index'])->name('showCategorys');
    Route::get('/dashboard/add-category', [App\Http\Controllers\ADCategoryController::class, 'addCategory'])->name('addCategory');
    Route::post('/dashboard/save-add-category', [App\Http\Controllers\ADCategoryController::class, 'saveAddCategory'])->name('saveAddCategory');
    Route::get('/dashboard/edit-category/{id}', [App\Http\Controllers\ADCategoryController::class, 'editCategory'])->name('editCategory');
    Route::post('/dashboard/save-edit-category/{id}', [App\Http\Controllers\ADCategoryController::class, 'saveEditCategory'])->name('saveEditCategory');
    Route::get('/dashboard/delete-category/{id}', [App\Http\Controllers\ADCategoryController::class, 'deleteCategory'])->name('deleteCategory');
    
    //Admin-CategoryParent
    Route::get('/dashboard/categorys-parent', [App\Http\Controllers\ADCategoryController::class, 'showCategoryParents'])->name('showCategoryParents');
    Route::get('/dashboard/add-category-parent', [App\Http\Controllers\ADCategoryController::class, 'addCategoryParent'])->name('addCategoryParent');
    Route::post('/dashboard/save-add-category-parent', [App\Http\Controllers\ADCategoryController::class, 'saveAddCategoryParent'])->name('saveAddCategoryParent');
    Route::get('/dashboard/edit-category-parent/{id}', [App\Http\Controllers\ADCategoryController::class, 'editCategoryParent'])->name('editCategoryParent');
    Route::post('/dashboard/save-edit-category-parent/{id}', [App\Http\Controllers\ADCategoryController::class, 'saveEditCategoryParent'])->name('saveEditCategoryParent');
    Route::get('/dashboard/delete-category-parent/{id}', [App\Http\Controllers\ADCategoryController::class, 'deleteCategoryParent'])->name('deleteCategoryParent');

    //Admin-Brand
    Route::get('/dashboard/brands', [App\Http\Controllers\ADBrandController::class, 'index'])->name('showBrands');
    Route::get('/dashboard/add-brand', [App\Http\Controllers\ADBrandController::class, 'addBrand'])->name('addBrand');
    Route::post('/dashboard/save-add-brand', [App\Http\Controllers\ADBrandController::class, 'saveAddBrand'])->name('saveAddBrand');
    Route::get('/dashboard/edit-brand/{id}', [App\Http\Controllers\ADBrandController::class, 'editBrand'])->name('editBrand');
    Route::post('/dashboard/save-edit-brand/{id}', [App\Http\Controllers\ADBrandController::class, 'saveEditBrand'])->name('saveEditBrand');
    Route::get('/dashboard/delete-brand/{id}', [App\Http\Controllers\ADBrandController::class, 'deleteBrand'])->name('deleteBrand');
});

//User-Client
Route::get('/', [\App\Http\Controllers\USHomeController::class, 'index'])->name('home');

//DetailsProduct
Route::get('/details-product/{id}', [\App\Http\Controllers\USHomeController::class, 'detailsProduct'])->name('detailsProduct');

//Filter By Category or Brand
// type = b -> brand, type = c -> category
Route::get('/{type}/{alias}/{id}', [\App\Http\Controllers\USHomeController::class, 'filterProducts'])->name('filterProducts');

Route::post('/payment', [\App\Http\Controllers\USHomeController::class, 'paymentCart']);
Route::post('/submit-payment', [\App\Http\Controllers\USHomeController::class, 'submitPaymentCart'])->name('submitPaymentCart');
Route::get('/complete-payment', [\App\Http\Controllers\USHomeController::class, 'completePaymentCart'])->name('completePaymentCart');
