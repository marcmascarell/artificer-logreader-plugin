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

    <div id="log-reader-plugin" class="container-fluid">
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
                            <th>Context</th>
                            <th>Date</th>
                            <th>Content</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($logs as $key => $log)
                            <tr data-display="stack{{{$key}}}">
                                <td class="text-{{{$log['level_class']}}}"><span class="glyphicon glyphicon-{{{$log['level_img']}}}-sign"
                                                                                 aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
                                <td class="text">{{$log['context']}}</td>
                                <td class="date">{{{$log['date']}}}</td>
                                <td class="text">
                                    @if ($log['stack']) <a class="pull-right expand btn btn-default btn-xs"
                                                           data-display="stack{{{$key}}}"><span
                                                class="glyphicon glyphicon-search"></span></a>@endif
                                    {{{$log['text']}}}
                                    @if (isset($log['in_file'])) <br/>{{{$log['in_file']}}}@endif
                                    @if ($log['stack'])
                                        <div class="stack" id="stack{{{$key}}}"
                                             style="display: none; white-space: pre-wrap;">{{{ trim($log['stack']) }}}
                                        </div>@endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                @endif
                <div>
                    @if($current_file)
                        <a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span>
                            Download file</a>
                        -
                        <a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span
                                    class="glyphicon glyphicon-trash"></span> Delete file</a>
                        @if(count($files) > 1)
                            -
                            <a id="delete-all-log" href="?delall=true"><span class="glyphicon glyphicon-trash"></span> Delete all files</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection