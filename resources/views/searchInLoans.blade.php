@include('navbar')

<body>
    <div class="container mt-4">
        @if(session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        <div class="card">
          <div class="card-header text-center font-weight-bold">
           بحث عن قرض
          </div>
          <div class="card-body">
            <form name="loans_deatils" id="loans_deatils" method="post" action="{{url('loans_deatils')}}">
             @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">اسم صاحب القرض<input type="text" id="client_name" name="client_name" class="form-control" required=""/></label>
              </div>          
              <button type="submit" class="btn btn-primary">بحث</button>
            </form>
          </div>
        </div>
        <br/>
        @if(session('id')!='')
<h4> الجدول الزمني الخاص بقرض السيد</h4> <h4><span style="color: #000081;font-size:46px">{{@session('name')}}</span> </h4>
<br/>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">اسم الزبون</th>
                <th scope="col"> قيمة القرض مع الفائدة</th>
                <th scope="col">عدد الدفعات الكلي</th>
                <th scope="col">عدد الدفعات المسددة</th>
                <th scope="col">تاريخ القرض</th>
              </tr>
            </thead>
            <tbody>
                @foreach(session('loans_data') as $client=>$c)
              <tr>
                <td>{{ $c['client_name']}}</td>
                <td>{{ $c['total_loan_amount']}}</td>
                <td>{{ $c['number_of_months']}}</td>
                <td>{{ $c['number_of_payments_paid']}}</td>
                <td>{{ $c['created_at']}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <h4>التفاصيل الخاصة بالدفعات</h4>
          <br/>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">رقم الدفعة</th>
                  <th scope="col"> قيمة الدفعة </th>
                  <th scope="col">تاريخ الدفعة</th>
                </tr>
              </thead>
              <tbody>
                  @foreach(session('loans_deatils') as $client=>$c)
                <tr>
                  <td>{{ $c['number_of_payment']}}</td>
                  <td>{{ $c['payment_value']}}</td>
                  <td>{{ $c['created_at']}}</td>

                </tr>
                @endforeach
              </tbody>
            </table>
        @endif
      </div>  
</body>
