@extends('backend.layouts.layout')
@section('content')

<div id="app_header_shadowing"></div>
<div id="app_content">
    <div id="content_header">
        <h3 class="user">{{ webarq::titleActionForm() }}</h3>
    </div>
    <div id="content_body">

        @include('backend.common.flashes')

        <div class = 'row'>
           <div class = 'col-md-12'>

                    {!! webarq::buttonCreate() !!}


                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Text 1</th>
                            <th>Text 2</th>
                            <th width = '5%'>Order</th>
                            <th width = '15%'>Action</th>
                        </tr>
                    </thead>

                </table>

            </div>

        </div>




    </div>
</div>
@endsection

@section('script')

    <script type="text/javascript">

        $(document).ready(function(){
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data") }}',
                columns: [
                    { data: 'image', name: 'image' },
                    { data: 'layer1', name: 'layer1' },
                    { data: 'layer2', name: 'layer2' },
                    { data: 'order', name: 'order' },
                    { data: 'action', name: 'action' , searchable: false},

                ]
            });
        });

    </script>

@endsection
