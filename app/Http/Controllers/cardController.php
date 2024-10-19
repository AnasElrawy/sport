<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CardSystem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;





class cardController extends Controller
{
    //

    public function card()
    {

        return view('cards.generate_cards');

        return response()->json([
            'message' => 'it is in card.'
          ], 200);
    }


    public function createCrard(Request $request)
    {

        
        // dd($request);

    //     "codeLength" => "اختر عدد الخانات"
    //   "formula" => "اختر صيغة الكود"
    //   "card_number" => null
    //   "price" => null


        $validatedData = $request->validate([
            'codeLength' => [
                'required',  // Code is required
                'numeric',    // Must be a string
                'min:8',     // Minimum length 6 characters
                'max:20',    // Maximum length 10 characters
                // 'unique:cards,unique_code'  // Ensure it's unique in 'cards' table
            ],
            'price' => [
                'required',  // Price is required
                'numeric',   // Must be a number
                'min:0'      // Price can't be negative
            ],
            'formula' =>  'required|in:letters_numbers,numbers,letters',
            'card_number' => 
            [
                'required',  
                'numeric',   
                'min:0'      
            ],
               
        ], [
            // Custom error messages
            'codeLength.required' => 'The code length field is mandatory.',
            'codeLength.numeric'  => 'The code length must be a numeric value.',
            'codeLength.min'      => 'The code length must be at least 8 characters.',
            'codeLength.max'      => 'The code length cannot be greater than 20 characters.',
            
            'price.required'      => 'The price field is required.',
            'price.numeric'       => 'The price must be a valid number.',
            'price.min'           => 'The price must be at least 0.',
            
            'formula.required'    => 'Please select a valid formula option.',
            'formula.in'          => 'The selected formula is invalid. Choose from letters_numbers, numbers, or letters.',
            
            'card_number.required'=> 'The card number field is required.',
            'card_number.numeric' => 'The card number must be a numeric value.',
            'card_number.min'     => 'The card number must be greater than or equal to 0.',
        ]);




        $characters='';

        if ($request->formula=="letters_numbers")
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        }
        else if($request->formula=="letters")
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            
        }
        else if ($request->formula=="numbers")
        {
            $characters = '0123456789';
            
        }
        
        
        $charactersNumber = strlen($characters);
        $codeLength = $request->codeLength;

        $lastFileId = CardSystem::orderBy('file_id', 'desc')->value('file_id'); // Get the last file_id
        $newFileId = $lastFileId ? $lastFileId + 1 : 1;  // Increment by 1 or set to 1 if no file_id exists


        // dd($newFileId);


        for ($i = 0; $i < $request->card_number; $i++) {

            $code = '';
    
            while (strlen($code) < $codeLength) {
                $position = rand(0, $charactersNumber - 1);
                $character = $characters[$position];
                $code = $code.$character;
            }
            

            CardSystem::create([
                'file_id' => $newFileId,
                'price' => $request->price,
                'code' => $code,
            ]);
        }


            // Flash success message to the session
    session()->flash('success', 'Card created successfully!');

    // Redirect back or to another route
    return redirect()->back();




    }


    public function chargeCrard(Request $request)
    {

        $user = Auth::user();
        // dd($user->id);



        $card=CardSystem::where('code', $request->code)->where('is_charged',false)->first();
        if($card)
        {
            $userId = $user->id;
            $amount = $card->price;
    
                    
            $user = User::where('id', $userId)->first();
            $rtr = $user->userBalance()->create([
                // 'balanceable_type' => PaymentType::UserBalance,
                'amount' => $amount,
                'user_id' => $userId,
                'balance_type' => 1,
                'status' => 1
            ]);


            $card->is_charged = true;
            $card->save();

            return redirect()->back()->with('success', 'تم شحن البطاقة بنجاح.');

        }else{
            // return response()->json([
            //     'message' => 'Card not found or has already been charged.'
            // ], 404);
            return redirect()->back()->with('error', 'لم يتم العثور على البطاقة أو تم شحنها بالفعل.');


        }
        
    }

    

}
