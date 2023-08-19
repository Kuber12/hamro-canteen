import { PDFDocument, rgb } from 'https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js'; // Adjust the path to the correct module location

// Attach the event listener to the button
document.getElementById('generateButton').addEventListener('click', downloadAsPDF);
async function downloadAsPDF() {
    const pdfDoc = await PDFDocument.create();
    const page = pdfDoc.addPage([400, 400]);
  
    const receiptDiv = document.getElementById('receipt');
    const receiptContent = receiptDiv.innerHTML;
  
    const contentStream = pdfDoc.register(page.drawText(receiptContent, { x: 50, y: 350, color: rgb(0, 0, 0) }));
    page.addContentStreams(contentStream);
  
    const pdfBytes = await pdfDoc.save();
  
    // Convert PDF bytes to Blob
    const pdfBlob = new Blob([pdfBytes], { type: 'application/pdf' });
  
    // Create a download link
    const link = document.createElement('a');
    link.href = URL.createObjectURL(pdfBlob);
    link.download = 'receipt.pdf';
  
    // Trigger the download
    link.click();
  }