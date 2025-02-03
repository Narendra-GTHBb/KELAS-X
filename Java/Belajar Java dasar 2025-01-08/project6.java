
import java.util.Scanner;


public class project6 {

   
    public static void main(String[] args) {
        Scanner InputUser= new Scanner(System.in);
        System.out.print("Inputkan Nilai Anda :");
        int nilai= InputUser.nextInt();
        System.out.println("Nilai yang anda inputkan adalah :"+nilai);
        
       if ((nilai >90) &&  (nilai<=100)){
           System.out.println("Nilai A");
       }else if((nilai>80) && (nilai<=90) ){
           System.out.println("Nilai B");
       }
    }
    
}

