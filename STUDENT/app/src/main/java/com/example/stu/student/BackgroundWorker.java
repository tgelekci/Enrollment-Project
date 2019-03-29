package com.example.stu.student;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;

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

public class BackgroundWorker extends AsyncTask<String, Void, String> {

    Context context;
    AlertDialog alertDialog;
    public String stuno_send;

    BackgroundWorker(Context ctx){
        context=ctx;
    }

    @Override
    protected String doInBackground(String... strings) {
        String type=strings[0];
        String login_url="http://192.168.43.104/STUDENT/studentlogin.php";
        if(type.equals("login")){
            try {
                String std_no=strings[1];
                stuno_send=strings[1];
                String std_pass=strings[2];

                URL url=new URL(login_url);
                HttpURLConnection httpURLConnection=(HttpURLConnection)url.openConnection();
                httpURLConnection.setRequestMethod("POST");
                httpURLConnection.setDoOutput(true);
                httpURLConnection.setDoInput(true);
                OutputStream outputStream=httpURLConnection.getOutputStream();
                BufferedWriter bufferedWriter=new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
                String post_data= URLEncoder.encode("std_no", "UTF-8")+"="+URLEncoder.encode(std_no, "UTF-8")+"&"
                        +URLEncoder.encode("std_pass", "UTF-8")+"="+URLEncoder.encode(std_pass, "UTF-8");
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
        alertDialog.setTitle("Login Status");
    }

    @Override
    protected void onPostExecute(String result) {
        if(result!=null&&result.equals("Login Successful")){
            Intent i=new Intent(context, ScannerActivity.class);
            i.putExtra("stuno_after_scan", stuno_send);
            context.startActivity(i);
        }

        else {
            alertDialog.setMessage(result);
            alertDialog.show();
        }
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
}
