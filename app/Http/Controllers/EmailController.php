<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
            'product_name' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'color' => 'nullable|string',
            'length' => 'nullable|string',
            'width' => 'nullable|string',
            'depth' => 'nullable|string',
            'measurement_unit' => 'nullable|string',
            'description' => 'nullable|string',
        ]);
        
        // Gather the email details
        $details = [
            'email' => $request->email,
            'subject' => 'New Custom Quote Request',
            'phone' => $request->phone,
            'product_name' => $request->product_name ?? 'N/A', // Handle null values
            'quantity' => $request->quantity ?? 'N/A',
            'color' => $request->color ?? 'N/A',
            'length' => $request->length ?? 'N/A',
            'width' => $request->width ?? 'N/A',
            'depth' => $request->depth ?? 'N/A',
            'measurement_unit' => $request->measurement_unit ?? 'N/A',
            'description' => $request->description ?? 'N/A',
        ];

        // Create the HTML content
        $htmlContent = "
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #000;
                    color: #fff;
                    text-align: center;
                    padding: 40px;
                }
                h1 {
                    font-size: 48px;
                    font-weight: bold;
                    color: #fff;
                    margin-bottom: 20px;
                    text-align: center;
                    text-shadow: 
                        -1px -1px 0 #000,  /* Top left */
                        1px -1px 0 #000,   /* Top right */
                        -1px 1px 0 #000,   /* Bottom left */
                        1px 1px 0 #000; 
                }
                p {
                    font-size: 20px;
                    margin: 20px 0;
                    text-align: center;
                }
                .details {
                    text-align: left;
                    margin: 20px auto;
                    background-color: #fff;
                    color: #000;
                    padding: 20px;
                    border-radius: 8px;
                    max-width: 600px;
                    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
                }
                .details .field {
                    margin-bottom: 15px;
                }
                .details .field strong {
                    color: #4CAF50;
                }
            </style>
        </head>
        <body>
            <h1 style='font-size: 48px; font-weight: bold; color: #3c6fb1; margin-bottom: 20px; '>
                Thank you.
            </h1>

            <p>We have received your details and will get back to you soon. Below is the information you provided:</p>
            <div class='details'>
                <div class='field'>
                    <strong>Product Name:</strong> <span style='font-weight:bold;'>{$details['product_name']}</span>
                </div>
                <div class='field'>
                    <strong>Quantity:</strong> {$details['quantity']}
                </div>
                <div class='field'>
                    <strong>Color:</strong> {$details['color']}
                </div>
                <div class='field'>
                    <strong>Dimensions:</strong> {$details['length']} x {$details['width']} x {$details['depth']} ({$details['measurement_unit']})
                </div>
                <div class='field'>
                    <strong>Description:</strong> {$details['description']}
                </div>
            </div>
        </body>
        </html>
        ";

        try {
            Mail::html($htmlContent, function ($message) use ($details) {
                $message->to($details['email'])
                        ->subject($details['subject']);
            });
            // print_r("Email sent successfully");exit();
            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            // Log the error for debuggings
            \Log::error('Email sending failed: ' . $e->getMessage());
            // print_r($e->getMessage());exit();

            return back()->with('error', 'Email sending failed!');
        }
        
        // Send the email using Laravel's Mail facade
        // Mail::send([], [], function ($message) use ($details, $htmlContent) {
        //     $message->to($details['email'])
        //             ->subject($details['subject'])
        //             ->html($htmlContent); // Set HTML content
        // });

        // Return a success message
        // return back()->with('success', 'Email sent successfully!');

        // php artisan config:clear
        // php artisan cache:clear

    }
}
