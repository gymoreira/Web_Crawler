/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package webcrawler;

import java.io.*;
import java.net.MalformedURLException;
import java.net.URL;

/**
 *
 * @author yago
 */
public class WebCrawler {
    public void getPage(URL url, File file) throws IOException {
        BufferedReader in =
                new BufferedReader(new InputStreamReader(url.openStream()));
 
         BufferedWriter out = new BufferedWriter(new FileWriter(file));
 
        String inputLine;
 
        while ((inputLine = in.readLine()) != null) {
            // Imprime página no console
            System.out.println(inputLine);
            // Grava pagina no arquivo
            out.write(inputLine);
            out.newLine();
        }
 
        in.close();
        out.flush();
        out.close();
    }
 
    public static void main(String[] args) {
        URL url = null;
        File file = new File("C:\\Arquivos_do_Web_Crawler\\Web_Crawler.html");
        try {
            url = new URL("http://www.bbc.com/sport/0/football/28051801");
            new WebCrawler().getPage(url, file);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}