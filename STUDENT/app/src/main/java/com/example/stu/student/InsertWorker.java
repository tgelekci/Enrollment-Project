package com.example.stu.student;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.AsyncTask;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by toshiba on 15.12.2017.
 */

public class InsertWorker extends AsyncTask<String, Void, String> {
    Context context;
    ImageView i;
    AlertDialog alertDialog;
    InsertWorker(Context ctt){
        context=ctt;
    }

    @Override
    protected String doInBackground(String... strings) {
        String type=strings[0];
        String save_url="http://192.168.43.104/STUDENT/inspectioninsert.php";
        if(type.equals("save")){
            try {
                String s_no=strings[1];
                String s_les=strings[2];
                String s_da=strings[3];
                URL url=new URL(save_url);
                HttpURLConnection httpURLConnection=(HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream=httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter=new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String post_data= URLEncoder.encode("s_no", "UTF-8")+"="+URLEncoder.encode(s_no, "UTF-8")+"&"
                        +URLEncoder.encode("s_les", "UTF-8")+"="+URLEncoder.encode(s_les, "UTF-8")+"&"
                        +URLEncoder.encode("s_da","UTF-8")+"="+URLEncoder.encode(s_da,"UTF-8");
                bufferedWriter.write(post_data);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();

                InputStream inputstream=httpURLConnection.getInputStream();
                BufferedReader bufferedReader=new BufferedReader((new InputStreamReader(inputstream, "iso-8859-1")));
                String result="";
                String line="";
                while ((line=bufferedReader.readLine())!=null){
                    result+=line;
                }
                bufferedReader.close();
                inputstream.close();
                httpURLConnection.disconnect();
                return result;

            } catch (MalformedURLException e) {
                e.printStackTrace();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return null;
    }

    @Override
    protected void onPreExecute() {
       alertDialog=new AlertDialog.Builder(context).create();
        alertDialog.setTitle("Enrollment Status");
        alertDialog.setButton("OK", new DialogInterface.OnClickListener(){

            @Override
            public void onClick(DialogInterface dialog, int which) {
                alertDialog.dismiss();
            }
        });

    }

    @Override
    protected void onPostExecute(String result) {
        if(result!=null&&result.equals("Insert Successful")){
            alertDialog.setIcon(R.drawable.tick);
            alertDialog.setMessage("Your Information Has Been Saved");
            alertDialog.show();

        }
        else{
            alertDialog.setIcon(R.drawable.cross);
            alertDialog.setMessage("Your Information Couldn't Be Saved");
            alertDialog.show();
        }
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
}
