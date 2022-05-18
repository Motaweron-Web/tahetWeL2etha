<form action="{{route('admins.store')}}" method="post" id="Form">
    @csrf
    <div class="row">
        <div class="col-6 mb-4">
            <label class="label mb-2 "> الإسم </label>
            <input type="text" name="name" value="" class="form-control">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">البريد الإلكترونى</label>
            <input type="email" name="email" value="" class="form-control">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">رقم الهاتف</label>
            <input type="text" name="phone" value="" class="form-control numbersOnly">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">كلمة المرور</label>
            <input type="password" name="password" value="" class="form-control ">
        </div>
    </div>
</form>
