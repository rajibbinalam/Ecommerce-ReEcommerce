@extends("admin.layout")

@section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">{{__('Subscriber')}}</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" style="text-decoration:none;font-size: 14px;">Dashboard</a></li>
                            <li class="breadcrumb-item active" style="font-size: 14px;">Subscriber</li>
                            
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Subscriber List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Subscribe Date</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($subscribers as $subscriber)
                                        <tr>
                                            <td>{{$subscriber->email}}</td>
                                            <td>{{$subscriber->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
</div>
        @endsection
