require 'json'
require 'cgi'
require 'iconv'
                                             
Dir.glob(File.join('results', '**')).each do |ch|
 	f = JSON.parse(File.open(ch, 'r').readlines.join("\n"))
	line = f[0]      
	puts f.inspect if line.nil?
	puts line.inspect
	line = line.gsub(/\s+<pre>\s+/, "")
       
	lines = line.split(",")

	section = lines[0]
	chapter = ""
	comment = ""    
	if lines[1]
		chapter = lines[1].match(/\s+([0-9]+\sKapitlet)\s/).to_s.strip                                                   
		comment = lines[1].gsub(chapter, "").strip
  end
	data = {:section => section, :chapter => chapter, :comment => comment, :verses => f[1..-1]}
	f1 = File.open(ch, 'w:UTF-8')
	f1.puts data.to_json
	f1.close
end