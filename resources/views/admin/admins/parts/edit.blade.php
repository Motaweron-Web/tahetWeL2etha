<form action="{{route('admins.update',$admin->id)}}" method="post" id="Form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-6 mb-4">
            <label class="label mb-2 "> الإسم </label>
            <input type="text" name="name" value="{{$admin->name}}" class="form-control">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">البريد الإلكترونى</label>
            <input type="email" name="email" value="{{$admin->email}}" class="form-control">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">رقم الهاتف</label>
            <input type="text" name="phone" value="{{$admin->phone}}" class="form-control numbersOnly">
        </div>
        <div class="col-6 mb-4">
            <label class="label mb-2 ">كلمة المرور</label>
            <input type="password" name="password" value="" class="form-control ">
        </div>
    </div>
</form>
