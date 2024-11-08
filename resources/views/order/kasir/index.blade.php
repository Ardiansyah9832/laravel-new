@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <a href="{{ route('kasir.order.create') }}" class="btn btn-primary">+ Pembelian Baru</a>
        </div>
    </div>

    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Obat</th>
                <th>Total Bayar</th>
                <th>Waktu</th>
                <th>Nama Kasir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($order) < 1)
                <tr>
                    <td colspan="6" class="text-center text-muted">Data Obat Kosong</td>
                </tr>
            @else
                @foreach ($order as $index => $item)
                    <tr>
                        <td>{{ ($order->currentPage() - 1) * $order->perPage() + ($index + 1) }}</td>
                        <td>{{ $item['name_costumer'] }}</td>

                        <td>
                            @foreach ($item['medicines'] as $val)
                                <li>
                                    {{ $val['name_medicine']}}
                                </li    >
                            @endforeach
                        </td>

                        <td>Rp. {{ number_format($item['total_price'], 0, ',', '.') }}</td>

                        <td>{{ $item['created_at'] }}</td>

                        <td>nama kasir</td>

                        <td>
                            <p>Download</p>
                        </td>


                        <td class="d-flex">
                            {{-- , $item['id'] pada route akan mengisi path dinamis {id} --}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-end my-3">

        {{ $order->links() }}
    </div>
@endsection
