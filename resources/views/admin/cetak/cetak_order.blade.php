<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>{{$title}}</title>

        <style>
            @page { size: A4 }
          
            h3 {
                font-weight: bold;
                text-align: center;
                font-size: 16px;
                line-height: inherit;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
            }
          
            .table {
                border-collapse: collapse;
                width: 100%;
                font-size: 16px;
                line-height: inherit;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
            }
          
            .table th {
                padding: 8px 8px;
                border:1px solid #000000;
                text-align: center;
            }
          
            .table td {
                padding: 3px 3px;
                border:1px solid #000000;
            }
          
            .text-center {
                text-align: center;
            }
        </style>
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
        <section>
            <div class="invoice-box">
                <table cellpadding="0" cellspacing="0">
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        {{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    </td>

                                    <td>
                                        {{$biodata->nama_website}}<br />
                                        {{$biodata->alamat}}<br />
                                        {{$biodata->email}}<br />
                                        {{$biodata->nomor_telepon}}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <section class="sheet padding-10mm" style="margin-top: -10px;">
            <h3>{{$title}}</h3>
      
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Member</th>
                        <th>Reklame</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <td>{{$item->id_pesanan}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->lokasi}}</td>
                        <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                        <td>
							@if ($item->harga === NULL)
							Menunggu Harga <br>
							@else
							<?= 'Rp ' . number_format($item->harga, 2, ',', '.'); ?> <br>
							@endif
						</td>
						<td>{{$item->status_order}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
	</body>
</html>