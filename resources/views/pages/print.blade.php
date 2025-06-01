@extends('layouts.main')

@section('body')
    <div class="container text-center my-5">
        <button onclick="printCertificate()" class="btn btn-warning">
            Print Cooking Certificate
        </button>

        <!-- Include pdf-lib.js -->
        <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
    </div>
    <script>
        async function printCertificate() {
            // Step 1: Load existing PDF template
            const existingPdfBytes = await fetch('file/certificate.pdf').then(res => res.arrayBuffer());

            // Step 2: Load the PDF with pdf-lib
            const pdfDoc = await PDFLib.PDFDocument.load(existingPdfBytes);

            // Step 3: Get the first page and its dimensions
            const page = pdfDoc.getPages()[0];
            const {
                width,
                height
            } = page.getSize();

            const font = await pdfDoc.embedFont(PDFLib.StandardFonts.HelveticaBold);

            const name = 'Martin Odegaard';
            const course = 'Cooking Basics';
            const duration = '3 Months';
            const performance = 'Excellent';

            // Helper function to center text
            function centerX(text, fontSize) {
                const textWidth = font.widthOfTextAtSize(text, fontSize);
                return (width - textWidth) / 2;
            }

            page.drawText(name, {
                x: width / 2 - 100, // Adjust for centering
                y: height - 200, // Adjust Y position
                size: 28,
                font,
                color: PDFLib.rgb(0, 0, 0),
            });

            page.drawText(course, {
                x: width / 2 - 100, // Adjust for centering
                y: height - 300, // Adjust Y position
                size: 28,
                font,
                color: PDFLib.rgb(0, 0, 0),
            });

            page.drawText(duration, {
                x: width / 2 - 75, // Adjust for centering
                y: height - 345, // Adjust Y position
                size: 16,
                font,
                color: PDFLib.rgb(0, 0, 0),
            });
            page.drawText(performance, {
                x: width / 2 - 100, // Adjust for centering
                y: height - 420, // Adjust Y position
                size: 28,
                font,
                color: PDFLib.rgb(0, 0, 0),
            });

            // Step 5: Save and open for printing
            const pdfBytes = await pdfDoc.save();
            const blob = new Blob([pdfBytes], {
                type: 'application/pdf'
            });
            const url = URL.createObjectURL(blob);

            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);

            iframe.onload = function() {
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
            };
        }
    </script>
@endsection
