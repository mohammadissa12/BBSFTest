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
            إضافة قرض
          </div>
          <div class="card-body">
            <form name="create_new_loan" id="create_new_loan" method="post" action="{{url('create_new_loan')}}">
             @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">اسم الزبون<input type="text" id="client_name" name="client_name" class="form-control" required=""/></label>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">قيمة القرض
                <input type="number" id="loan_amount" name="loan_amount" class="form-control" min="100000" max="10000000"required=""/></label>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">عدد الاشهر
                <select class="form-control" name="number_of_months" required="">
                    <option >12 </option>
                    <option >24</option>
                    <option >48</option>
                
            </select></label>
        </div>
              
              <button type="submit" class="btn btn-primary" onclick="return confirm('هل انت متأكد من إضافة القرض?')">إضافة القرض</button>
            </form>
          </div>
        </div>
        <br/>
        @if(session('name')!='')
<h4> الجدول الزمني الخاص بقرض السيد</h4> <h4><span style="color: #000081;font-size:46px">{{@session('name')}}</span> </h4>
<br/>
<h4> قيمة القرض الاجمالية مع الضرائب {{@session('amount')}}</h4>
<br/>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">قيمة الدفعة</th>
                <th scope="col">رقم الدفعة</th>
                <th scope="col">التاريخ</th>
              </tr>
            </thead>
            <tbody>
                @if(session('table')!=Null)
                @foreach(session('table') as $table=>$t)
              <tr>
                <td>{{ $t['payment']}}</td>
                <td>{{ $t['number']}}</td>
                <td>{{ $t['month']}}</td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          @endif
      </div>  
</body>
