@extends($layout)

@section('content-header')
    <h1>
        <span class="fa fa-book" aria-hidden="true"></span> Log Reader
        <small>by Rap2h</small>
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="{{ $icon['extension'] }}"></i> Extensions
            </a>
        </li>
    </ol>
@overwrite

@section('content')

    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">

    <style>
        #log-reader-plugin .stack {
            font-size: 0.85em;
        }
        #log-reader-plugin .date {
            min-width: 75px;
        }
        #log-reader-plugin .text {
            word-break: break-all;
        }
        #log-reader-plugin a.llv-active {
            z-index: 2;
            background-color: #f5f5f5;
            border-color: #d2cccc;
        }

        #log-reader-plugin .list-group {
            display: inline-block;
        }

        #log-reader-plugin .list-group-item {
            padding: 5px 10px;
        }

    </style>

    <div class="container-fluid" id="log-reader-plugin">
        <div class="row">
            <div class="col-sm-12">
                <div class="list-group">
                    @foreach($files as $file)
                        <a href="?l={{ base64_encode($file) }}" class="list-group-item @if ($current_file == $file) llv-active @endif">
                            <i class="fa fa-file-o"></i> {{$file}}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-12 table-container">
                @if ($logs === null)
                    <div>
                        Log file >50M, please download it.
                    </div>
                @else
                    <table id="table-log" class="table table-striped">
                        <thead>
                        <tr>
                            <th>Level</th>
                            <th>Date</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($logs as $key => $log)
                            <tr>
                                <td class="text-{{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                                <td class="date">{{{$log['date']}}}</td>
                                <td class="text">
                                    @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs" data-display="stack{{{$key}}}"><span class="glyphicon glyphicon-search"></span></a>@endif
                                    {{{$log['text']}}}
                                    @if (isset($log['in_file'])) <br />{{{$log['in_file']}}}@endif
                                    @if ($log['stack']) <div class="stack" id="stack{{{$key}}}" style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}</div>@endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
                <div>
                    <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> Download file</a>
                    -
                    <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> Delete file</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function(){
            $('#table-log').DataTable({
                "order": [ 1, 'desc' ],
                "stateSave": true,
                "stateSaveCallback": function (settings, data) {
                    window.localStorage.setItem("datatable", JSON.stringify(data));
                },
                "stateLoadCallback": function (settings) {
                    var data = JSON.parse(window.localStorage.getItem("datatable"));
                    if (data) data.start = 0;
                    return data;
                }
            });
            $('.table-container').on('click', '.expand', function(){
                $('#' + $(this).data('display')).toggle();
            });
            $('#delete-log').click(function(){
                return confirm('Are you sure?');
            });
        });
    </script>
@endsection