<style>
    .qr-modal-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
    }

    .qr-modal-container svg {
        max-width: 220px;
        width: 100%;
        height: auto;
    }

    .qr-modal-container p {
        margin: 6px 0;
        font-size: 16px;
        font-weight: bold;
    }

    .print-button {
        margin-top: 15px;
    }

    @page {
        size: A4 portrait;
        margin: 10mm;
    }

    @media print {

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: auto;
            overflow: visible;
        }

        body * {
            visibility: hidden;
        }

        #print-area,
        #print-area * {
            visibility: visible;
        }

        #print-area {
            position: static;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin: 0 auto;
            page-break-inside: avoid;
        }

        .no-print {
            display: none !important;
        }

        .qr-modal-container svg {
            max-width: 200px;
            width: 100%;
            height: auto;
        }
    }
</style>

<div id="print-area" class="qr-modal-container">

    <div>
        {!! $qr !!}
    </div>

    <div style="margin-top:15px;">
        <p>
            <strong>Barang :</strong>
            {{ $record->barang?->nama }}
        </p>

        <p>
            <strong>Bagian :</strong>
            {{ $record->bagian?->nama }}
        </p>

        @if($record->batch)
            <p>
                <strong>Batch :</strong>
                {{ $record->batch }}
            </p>
        @endif
    </div>

    <div class="no-print print-button">
        <button
            type="button"
            class="fi-btn fi-btn-primary"
            onclick="window.print()">
            Print
        </button>
    </div>

</div>