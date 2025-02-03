
public class smkn2 {

    
    public static void main(String[] args) {
       Xrpl object = new Xrpl();
       
        System.out.println("Nama Saya Adalah: " + object.nama);
        System.out.println("Alamat Saya Adalah: " + object.alamat);
        System.out.println("Umur Saya Adalah: " + object.umur);
        System.out.println("Tahun Lahir Saya Adalah: " + object.thunlhir);
        System.out.println(" ");
        
        object.Belajar();
        System.out.println(" ");
        double Menghitungnilai= object.nilai();
        System.out.println("Nilai Rerata Kelas X-RPL Adalah :" + Menghitungnilai);
    }
    
}
