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
           بحث عن زبون
          </div>
          <div class="card-body">
            <form name="search_in_loans" id="search_in_loans" method="post" action="{{url('search_in_loans')}}">
             @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">اسم الزبون<input type="text" id="client_name" name="client_name" class="form-control" required=""/></label>
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
                @foreach(session('client_details') as $client=>$c)
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
          
          <br/>
          <form name="make_payment" id="make_payment" method="post" action="{{url('make_payment')}}">
            @csrf
            <input type="text" id="id" name="id" class="form-control" required="" hidden value="{{@session('id')}}">
          <button type="submit" class="btn btn-primary" onclick="return confirm('هل انت متأكد من إضافة دفعة من القرض?')">تسديد دفعة جديدة</button>
        </form>
        @endif
      </div>  
</body>
