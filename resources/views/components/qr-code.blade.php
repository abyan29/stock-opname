<style>
    .qr-modal-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 100%;
        padding: 1rem;
    }

    .qr-modal-container>* {
        margin: 0.5rem 0;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #print-area,
        #print-area * {
            visibility: visible;
        }

        #print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }
</style>
<div class="qr-modal-container" id="print-area">
    <div>
        {!! $qr !!}
    </div>
    <div>
        <p><strong>Bagian:</strong> {{ $record->bagian?->nama }}</p>
        <p><strong>Barang:</strong> {{ $record->barang?->nama }}</p>
    </div>
    <div class="no-print">
        <button class="fi-btn fi-btn-primary" onclick="window.print()" type="button">
            Print
        </button>
    </div>
</div>
