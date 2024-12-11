<!DOCTYPE html>
@extends('main-page')
@section('content')

    <head>
        <title>Evaluation Summary Report</title>
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
            <h1 class="title-name-menu">Evaluation Summary Report</h1>
        </div>
        <div class="container1">
            <label for="name" class="form-label">Team</label>
            <select id="team_data" name="team_data" class="js-example-basic-single">
                <option value="{{ null }}">All Teams</option>
                @if ($Team != null)
                    @foreach ($Team as $row)
                        <option value="{{ $row->Team }}">{{ $row->Team }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="row">
            <table nane="report_table" id="report_table" class="table table-bordered table-striped mt-10"
                style="width: 100%">
                <thead>
                    <tr>
                        {{-- <th style="width: 0%">Team</th> --}}
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

                    @if ($V_EvaluationSumaryReport != null)
                        @foreach ($V_EvaluationSumaryReport as $row)
                            <tr>
                                {{-- <th style="width: 0%">{{ $row->Team }}</th> --}}
                                <th class="dt-head-center">{{ $row->ContactAgentName }}</th>
                                <th class="dt-head-center">{{ $row->Answer }}</th>
                                <th class="dt-head-center">{{ $row->AgentSentToQC }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfAgentSentToQC }}</th>
                                <th class="dt-head-center">{{ $row->AgentNotSentToQC }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfAgentNotSentToQC }}</th>
                                <th class="dt-head-center">{{ $row->Evalauted }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvalauted }}</th>
                                <th class="dt-head-center">{{ $row->EvaluatedAsFive }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvaluatedAsFive }}</th>
                                <th class="dt-head-center">{{ $row->EvaluatedAsFour }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvaluatedAsFour }}</th>
                                <th class="dt-head-center">{{ $row->EvaluatedAsThree }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvaluatedAsThree }}</th>
                                <th class="dt-head-center">{{ $row->EvaluatedAsTwo }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvaluatedAsTwo }}</th>
                                <th class="dt-head-center">{{ $row->EvaluatedAsOne }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfEvaluatedAsOne }}</th>
                                <th class="dt-head-center">{{ $row->NoAction }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfNoAction }}</th>
                                <th class="dt-head-center">{{ $row->MSS }}</th>
                                <th class="dt-head-center">{{ $row->PercentOfMSS }}</th>

                            </tr>
                        @endforeach
                    @endif

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

            // const tableBody = document.getElementById('report_table').getElementsByTagName('tbody')[0];
            // Clear existing rows
            // tableBody.innerHTML = '';

            var combatData = <?php echo json_encode($V_EvaluationSumaryReport); ?>;
            var data = [

            ];



            // console.log(combatData);

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


        const dropdown = document.getElementById('team_data');

        // const table = document.getElementById('report_table');
        // const rows = table.getElementsByTagName('tr');


        dropdown.addEventListener('change', function() {
            // Get the selected value
            // const selectedValue = dropdown.value;
            // // console.log(selectedValue);
            // // Loop through table rows (skip the header row)
            // for (let i = 1; i < rows.length; i++) {
            //     const teamCell = rows[i].getElementsByTagName('td')[0];
            //     const teamInTable = teamCell.textContent;

            //     // If "All" is selected or the category matches the filter, show the row; otherwise, hide it
            //     if (selectedValue === 'all' || teamInTable === selectedValue) {
            //         rows[i].style.display = '';
            //     } else {
            //         rows[i].style.display = 'none';
            //     }
            // }

        });
    </script>
@endsection
