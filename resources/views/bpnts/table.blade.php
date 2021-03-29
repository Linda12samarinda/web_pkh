
<div class="table-responsive">
    <table class="table" id="datatables">
        <thead>
            <tr>
                <th>Name</th>
                <th>Name Suami</th>
                <th>No Kk</th>
                <th>Alamat</th>
                <th>Name Ibukandung</th>
                <th>No Kartu</th>
                <th>Kriteria Miskin</th>
                <th>Status</th>
                <th>Kmp Bpnt</th>
                <th>Keterangan</th>
                <th>Rt</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bpnts as $bpnt)
            <tr>
            <td>{{ $bpnt->name }}</td>
            <td>{{ $bpnt->name_suami }}</td>
            <td>{{ $bpnt->no_kk }}</td>
            <td>{{ $bpnt->alamat }}</td>
            <td>{{ $bpnt->name_ibukandung }}</td>
            <td>{{ $bpnt->no_kartu }}</td>
            <td>{{ $bpnt->kriteria_miskin }}</td>
            <td>{{ $bpnt->status }}</td>
            <td>{{ $bpnt->kmp_bpnt }}</td>
            <td>{{ $bpnt->keterangan }}</td>
            <td>{{ $bpnt->rt->name }}</td>
                <td>
                    {!! Form::open(['route' => ['bpnts.destroy', $bpnt->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('bpnts.show', [$bpnt->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('bpnts.edit', [$bpnt->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
        <th>Name Suami</th>
        <th>No Kk</th>
        <th>Alamat</th>
        <th>Name Ibukandung</th>
        <th>No Kartu</th>
        <th>Kriteria Miskin</th>
        <th>Status</th>
        <th>Kmp Bpnt</th>
        <th>Keterangan</th>
        <th>Rt</th>
                <th colspan="3">Action</th>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>
@endpush
