<!DOCTYPE html>
@extends('main-page')
@section('content')

    <head>
        <title>Report-1</title>
        {{-- Toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
            crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous"></script>
    </head>

    <div id="body-inside" class="body-inside-normal">
        <div style="padding: 15px 0px 15px 0px">
            <h1 class="title-name-menu">Report-1</h1>
        </div>
        <div class="container1">
            <label for="name" class="form-label">Team</label>
            <input type="text" id="name" class="form-input" placeholder="Enter your team">
        </div>
        <div class="row">
            <table nane="report_table" id="report_table" class="table table-bordered table-striped mt-10"
                style="width: 100%">
                <thead>
                    <tr>
                        <th class="dt-head-center">Agent</th>
                        <th class="dt-head-center">Answer</th>
                        <th class="dt-head-center">Agent Sent to QC</th>
                        <th class="dt-head-center">Agent Sent to QC (%)</th>
                        <th class="dt-head-center">Agent Not Sent to QC</th>
                        <th class="dt-head-center">Agent Not Sent to QC (%)</th>
                        <th class="dt-head-center">Evaluated</th>
                        <th class="dt-head-center">Evaluated (%)</th>
                        <th class="dt-head-center">5 (Very Good)</th>
                        <th class="dt-head-center">5 (Very Good) (%)</th>
                        <th class="dt-head-center">4 (Good)</th>
                        <th class="dt-head-center">4 (Good) (%)</th>
                        <th class="dt-head-center">3 (Fair)</th>
                        <th class="dt-head-center">3 (Fair) (%)</th>
                        <th class="dt-head-center">2 (Bad)</th>
                        <th class="dt-head-center">2 (Bad) (%)</th>
                        <th class="dt-head-center">1 (Very Bad)</th>
                        <th class="dt-head-center">1 (Very Bad) (%)</th>
                        <th class="dt-head-center">No Action</th>
                        <th class="dt-head-center">No Action (%)</th>
                        <th class="dt-head-center">MSS</th>
                        <th class="dt-head-center">MSS (%)</th>

                    </tr>
                </thead>

                <tbody>

                    {{-- @if ($monitor_data != null)
                        @foreach ($monitor_data as $row)
                            <tr>
                                <th class="dt-head-center">{{ $row['ID'] }}</th>
                                <th>{{ $row['Email'] }}</th>
                                <td class="dt-head-center">{{ $row['Status'] }}</td>
                                <td class="dt-head-center">{{ $row['Datetime'] }}</td>
                            </tr>
                        @endforeach
                    @endif --}}

                </tbody>

            </table>

        </div>


        @if (session('toastr'))
            <script>
                var toastrMessage = @json(session('toastr'));
                toast_action(toastrMessage);
            </script>
        @endif

    </div>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#report_table').DataTable({
                dom: '<"top-wrapper"l>rti<"bottom-wrapper"p>',
                order: [
                    [0, 'asc']
                ],
                lengthMenu: [
                    [10, 50, 100, "All"],
                    [10, 50, 100, "All"]
                ]
            });
        })
    </script>

@endsection

