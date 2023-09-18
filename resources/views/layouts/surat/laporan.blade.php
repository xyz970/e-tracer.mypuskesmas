{{-- <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-top:0cm;margin-right:60.3pt;margin-bottom:.0001pt;margin-left:92.15pt;text-align:center;line-height:115%;'><strong><span style="font-size:16px;line-height:115%;">LAPORAN KETERLAMBATAN BERKAS&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-top:0cm;margin-right:60.3pt;margin-bottom:.0001pt;margin-left:78.0pt;text-align:center;line-height:115%;'><strong><span style="font-size:16px;line-height:115%;">REKAM MEDIS PUSKESMAS SEMBORO</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;line-height:115%;'><strong><span style="font-size:16px;line-height:115%;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;'><span style="font-size:16px;">&nbsp;</span></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;'><span style="font-size:16px;">Tanggal Pelaporan &nbsp; &nbsp; &nbsp;: {{ $tanggal }}</span></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;'>&nbsp;</p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><span style="font-size:16px;">Nama Petugas RM &nbsp; &nbsp; &nbsp;: {{ $user->nama }}</span></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
<table style="float: left;width: 4.1e+2pt;border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:6.75pt;">
    <tbody>
        <tr>
            <td style="width: 28.1pt;border: 1pt solid black;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">No</span></p>
            </td>
            <td style="width: 63.8pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Nama</span></p>
            </td>
            <td style="width: 49.6pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">No RM</span></p>
            </td>
            <td style="width: 70.9pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Tanggal</span></p>
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Kunjungan</span></p>
            </td>
            <td style="width: 63.8pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Alamat</span></p>
            </td>
            <td style="width: 63.75pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">No BPJS</span></p>
            </td>
            <td style="width: 70.85pt;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0cm 5.4pt;height: 34.95pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Status</span></p>
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">Berkas</span></p>
            </td>
        </tr>
       @foreach ($peminjaman as $key => $value)
         <tr>
            <td style="width: 28.1pt;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $key+1 }}</span></p>
            </td>
            <td style="width: 63.8pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->rekam_medik->nama_pasien }}</span></p>
            </td>
            <td style="width: 49.6pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->id_rm }}</span></p>
            </td>
            <td style="width: 70.9pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->waktu_peminjaman }}</span></p>
            </td>
            <td style="width: 63.8pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->rekam_medik->alamat }}</span></p>
            </td>
            <td style="width: 63.75pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->rekam_medik->no_bpjs }}</span></p>
            </td>
            <td style="width: 70.85pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0cm 5.4pt;height: 37.05pt;vertical-align: top;">
                <p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;text-align:center;'><span style="font-size:16px;">{{ $value->terlambat == 'true' ? 'Terlambat' : 'Tepat Waktu'}}</span></p>
            </td>
        </tr>
       @endforeach

    </tbody>
</table>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-right:60.3pt;line-height:13.0pt;'><strong><span style="font-size:16px;">&nbsp;</span></strong></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-top:0cm;margin-right:-.05pt;margin-bottom:.0001pt;margin-left:290.6pt;line-height:13.0pt;'><span style="font-size:16px;">Jember,  {{ $tanggal }}</span></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-top:0cm;margin-right:-.05pt;margin-bottom:.0001pt;margin-left:290.6pt;line-height:13.0pt;'><span style="font-size:16px;">&nbsp;</span></p>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;'>&nbsp;</p>
<div style="align-items: end; padding-left: 60%;">
    <img src="{{ $file }}" alt="" srcset="">
</div>
<p style='margin:0cm;font-size:13px;font-family:"Times New Roman",serif;margin-top:0cm;margin-right:-.05pt;margin-bottom:.0001pt;margin-left:11.0cm;text-indent:-7.05pt;line-height:13.0pt;'><span style="font-size:16px;">( {{ $user->nama }})</span></p> --}}


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="generator" content="Aspose.Words for .NET 23.6.0" />
    <title></title>
    <style type="text/css">
        body {
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0pt
        }

        li,
        table {
            margin-top: 0pt;
            margin-bottom: 0pt
        }

        h1 {
            margin-top: 12pt;
            margin-left: 36pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: avoid;
            line-height: normal;
            font-family: Cambria;
            font-size: 16pt;
            font-weight: bold;
            color: #000000
        }

        h2 {
            margin-top: 12pt;
            margin-left: 72pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: avoid;
            line-height: normal;
            font-family: Cambria;
            font-size: 14pt;
            font-weight: bold;
            font-style: italic;
            color: #000000
        }

        h3 {
            margin-top: 12pt;
            margin-left: 108pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: avoid;
            line-height: normal;
            font-family: Cambria;
            font-size: 13pt;
            font-weight: bold;
            color: #000000
        }

        h4 {
            margin-top: 12pt;
            margin-left: 144pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: avoid;
            line-height: normal;
            font-family: Calibri;
            font-size: 14pt;
            font-weight: bold;
            font-style: normal;
            color: #000000
        }

        h5 {
            margin-top: 12pt;
            margin-left: 180pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: auto;
            line-height: normal;
            font-family: Calibri;
            font-size: 13pt;
            font-weight: bold;
            font-style: italic;
            color: #000000
        }

        h6 {
            margin-top: 12pt;
            margin-left: 216pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: auto;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 11pt;
            font-weight: bold;
            color: #000000
        }

        .Heading7 {
            margin-top: 12pt;
            margin-left: 252pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: auto;
            line-height: normal;
            font-family: Calibri;
            font-size: 12pt;
            font-weight: normal;
            font-style: normal;
            color: #000000;
            -aw-style-name: heading7
        }

        .Heading8 {
            margin-top: 12pt;
            margin-left: 288pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: auto;
            line-height: normal;
            font-family: Calibri;
            font-size: 12pt;
            font-weight: normal;
            font-style: italic;
            color: #000000;
            -aw-style-name: heading8
        }

        .Heading9 {
            margin-top: 12pt;
            margin-left: 324pt;
            margin-bottom: 3pt;
            text-indent: -36pt;
            page-break-inside: auto;
            page-break-after: auto;
            line-height: normal;
            font-family: Cambria;
            font-size: 11pt;
            font-weight: normal;
            font-style: normal;
            color: #000000;
            -aw-style-name: heading9
        }

        .BalloonText {
            margin-bottom: 0pt;
            line-height: normal;
            font-family: Tahoma;
            font-size: 8pt
        }

        .BodyText {
            margin-bottom: 0pt;
            line-height: normal;
            widows: 0;
            orphans: 0;
            font-family: 'Times New Roman';
            font-size: 12pt
        }

        .CommentSubject {
            margin-bottom: 0pt;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 10pt;
            font-weight: bold
        }

        .CommentText {
            margin-bottom: 0pt;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        .Footer {
            margin-bottom: 0pt;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        .Header {
            margin-bottom: 0pt;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        .ListParagraph {
            margin-left: 36pt;
            margin-bottom: 0pt;
            line-height: normal;
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        .TableParagraph {
            margin-bottom: 0pt;
            text-align: center;
            line-height: normal;
            widows: 0;
            orphans: 0;
            font-family: 'Times New Roman';
            font-size: 11pt
        }

        .Title {
            margin: 7.8pt 57.05pt 0pt 84.85pt;
            text-indent: 60.8pt;
            line-height: normal;
            widows: 0;
            orphans: 0;
            font-family: 'Times New Roman';
            font-size: 15pt;
            font-weight: bold
        }

        span.BalloonTextChar {
            font-family: Tahoma;
            font-size: 8pt
        }

        span.BodyTextChar {
            font-family: 'Times New Roman';
            font-size: 12pt
        }

        span.CommentReference {
            font-size: 8pt
        }

        span.CommentSubjectChar {
            font-family: 'Times New Roman';
            font-size: 10pt;
            font-weight: bold
        }

        span.CommentTextChar {
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        span.FooterChar {
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        span.HeaderChar {
            font-family: 'Times New Roman';
            font-size: 10pt
        }

        span.Heading1Char {
            font-family: Cambria;
            font-size: 16pt;
            font-weight: bold
        }

        span.Heading2Char {
            font-family: Cambria;
            font-size: 14pt;
            font-weight: bold;
            font-style: italic
        }

        span.Heading3Char {
            font-family: Cambria;
            font-size: 13pt;
            font-weight: bold
        }

        span.Heading4Char {
            font-family: Calibri;
            font-size: 14pt;
            font-weight: bold
        }

        span.Heading5Char {
            font-family: Calibri;
            font-size: 13pt;
            font-weight: bold;
            font-style: italic
        }

        span.Heading6Char {
            font-family: 'Times New Roman';
            font-weight: bold
        }

        span.Heading7Char {
            font-family: Calibri;
            font-size: 12pt
        }

        span.Heading8Char {
            font-family: Calibri;
            font-size: 12pt;
            font-style: italic
        }

        span.Heading9Char {
            font-family: Cambria
        }

        span.TitleChar {
            font-family: 'Times New Roman';
            font-size: 15pt;
            font-weight: bold
        }

        .TableGrid {}
    </style>
</head>

<body>
    <div>
        <div style="-aw-headerfooter-type:header-primary; clear:both">
            <p style="text-align:center; font-size:14pt"><span
                    style="height:0pt; text-align:left; display:block; position:absolute; z-index:-65535"><img
                        src="{{ asset('images/logo-instansi.jpeg') }}" width="94" height="97"
                        alt=""
                        style="margin-top:0.4pt; margin-left:-22.9pt; -aw-left-pos:-22.9pt; -aw-rel-hpos:column; -aw-rel-vpos:paragraph; -aw-top-pos:0.4pt; -aw-wrap-type:none; position:absolute" /></span><span>PEMERINTAH
                    KABUPATEN JEMBER</span></p>
            <p style="text-align:center; font-size:14pt"><span>DINAS KESEHATAN</span></p>
            <p class="ListParagraph" style="margin-left:0pt; text-align:center; widows:0; orphans:0; font-size:14pt">
                <span style="font-weight:bold">UPTD PUSKESMAS SEMBORO</span>
            </p>
            <p class="ListParagraph" style="margin-left:0pt; text-align:center; widows:0; orphans:0; font-size:12pt">
                <span>Jl. Pelita No. 2 Sidomekar Semboro, Jember. Kode Pos 68157 </span>
            </p>
            <p class="ListParagraph" style="margin-left:0pt; text-align:center; widows:0; orphans:0; font-size:12pt">
                <span style="height:0pt; text-align:left; display:block; position:absolute; z-index:-65536"><img
                        src="{{ asset('images/garis.png') }}" width="775" height="8" alt=""
                        style="margin-top:14.05pt; margin-left:-26.4pt; -aw-left-pos:-24.8pt; -aw-rel-hpos:column; -aw-rel-vpos:paragraph; -aw-top-pos:14.95pt; -aw-wrap-type:none; position:absolute" /></span><span>Telp
                    0336442192, Email:</span><span style="color:#4472c4">semboro.puskesmas@gmail.com </span><span
                    style="color:#4472c4; -aw-import:spaces">&#xa0;</span>
            </p>
        </div>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-bottom:0.1pt; line-height:151%"><span style="-aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; margin-left:92.15pt; text-align:center; line-height:115%; font-size:12pt"><span
                style="font-weight:bold; letter-spacing:-0.1pt">LAPORAN KETERLAMBATAN BERKAS </span></p>
        <p style="margin-right:60.3pt; margin-left:78pt; text-align:center; line-height:115%; font-size:12pt"><span
                style="font-weight:bold; letter-spacing:-0.1pt">REKAM MEDIS PUSKESMAS SEMBORO</span></p>
        <p style="line-height:115%; font-size:12pt"><span
                style="font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="font-size:12pt"><span style="letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="font-size:12pt"><span style="letter-spacing:-0.1pt">Tanggal Pelaporan </span><span
                style="width:14.7pt; letter-spacing:-0.1pt; display:inline-block">&#xa0;</span><span
                style="letter-spacing:-0.1pt">: {{ \Carbon\Carbon::now()->translatedFormat('d F Y')  }}</span></p>
        <p><span style="-aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span style="font-size:12pt; letter-spacing:-0.1pt">Nama
                Petugas RM </span><span
                style="width:14.34pt; font-size:12pt; letter-spacing:-0.1pt; display:inline-block">&#xa0;</span><span
                style="font-size:12pt; letter-spacing:-0.1pt">: {{ Auth::user()->nama }}</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <table cellspacing="0" cellpadding="0" class="TableGrid"
            style="width:411.55pt; margin-right:9pt; margin-left:9pt; border:0.75pt solid #000000; -aw-border:0.5pt single; -aw-border-insideh:0.5pt single #000000; -aw-border-insidev:0.5pt single #000000; border-collapse:collapse; float:left">
            <tr style="height:34.95pt">
                <td
                    style="width:17.3pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-right:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>No</span></p>
                </td>
                <td
                    style="width:53pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-right:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>Nama</span></p>
                </td>
                <td
                    style="width:38.8pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-right:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>No RM</span></p>
                </td>
                <td
                    style="width:60.1pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-right:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>Tanggal</span></p>
                    <p style="text-align:center; font-size:12pt"><span>Kunjungan</span></p>
                </td>
                <td
                    style="width:53pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-right:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>Alamat</span></p>
                </td>
                <td
                    style="width:60.05pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single">
                    <p style="text-align:center; font-size:12pt"><span>Status</span></p>
                    <p style="text-align:center; font-size:12pt"><span>Berkas</span></p>
                </td>
            </tr>
            @foreach ($peminjaman as $key => $value)
                <tr style="height:37.05pt">
                    <td
                        style="width:17.3pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-right:0.5pt single; -aw-border-top:0.5pt single">
                        <p style="text-align:center; font-size:12pt"><span>{{ $key + 1 }}</span></p>
                    </td>
                    <td
                        style="width:53pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="text-align:center; font-size:12pt"><span>{{ $value->rekam_medik->nama_pasien }}</span>
                        </p>
                    </td>
                    <td
                        style="width:38.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="text-align:center; font-size:12pt"><span>{{ $value->id_rm }}</span></p>
                    </td>
                    <td
                        style="width:60.1pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="text-align:center; font-size:12pt"><span>{{ $value->waktu_peminjaman }}</span></p>
                    </td>
                    <td
                        style="width:53pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border:0.5pt single">
                        <p style="text-align:center; font-size:12pt"><span>{{ $value->rekam_medik->alamat }}</span></p>
                    </td>
                    <td
                        style="width:60.05pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top; -aw-border-bottom:0.5pt single; -aw-border-left:0.5pt single; -aw-border-top:0.5pt single">
                        <p style="text-align:center; font-size:12pt">
                            <span>{{ $value->terlambat == 'true' ? 'Terlambat' : 'Tepat Waktu' }}</span></p>
                    </td>
                </tr>
            @endforeach
        </table>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-right:60.3pt; line-height:13pt"><span
                style="font-size:12pt; font-weight:bold; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-left:290.6pt; line-height:13pt"><span style="font-size:12pt; letter-spacing:-0.1pt">Jember ,
                {{ $tanggal }}</span></p>
        <p style="margin-left:290.6pt; line-height:13pt"><span
                style="font-size:12pt; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <p style="margin-left:311.85pt; text-indent:-7.05pt; line-height:13pt"><span
                style="font-size:12pt; letter-spacing:-0.1pt">({{ $user->nama }})</span></p>
        <p style="text-align:justify; line-height:13pt"><span
                style="font-size:12pt; letter-spacing:-0.1pt; -aw-import:ignore">&#xa0;</span></p>
        <div style="-aw-headerfooter-type:footer-primary; clear:both">
            <p class="Footer" style="text-align:right; font-size:12pt"><span style="-aw-import:ignore">&#xa0;</span>
            </p>
        </div>
    </div>
</body>

</html>
